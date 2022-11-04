<?php

namespace App\Twig;

use App\Repository\PlannedActivityRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private const DEFAULT_LOCALE = 'fr';


    public function getFilters()
    {
        return [
            new TwigFilter('formatDayOfWeek', [$this, 'formatDayOfWeek']),
            new TwigFilter('formatHour', [$this, 'formatHour']),
            new TwigFilter('formatDate', [$this, 'formatDate']),
            new TwigFilter('dateToPaneTitle', [$this, 'dateToPaneTitle']),
            ];
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('getTimeDuration', [$this, 'getTimeDuration']),
            new TwigFunction('getHourGap', [$this, 'getHourGap']),
        ];
    }

    private function getLocale(): string {
        return explode('-', \Locale::getDefault())[0];
    }

    private function getGap(\DateTime|int $time): int
    {
        if($time instanceof \DateTime) {
            list($h, $m) = explode(':', $time->format('G:i'));

            $h *= 2;

            if ($m >= 30) {
                $h++;
            }

        } else {
            $h = (int) $time * 2;
        }

        return $h;
    }

    public function getHourGap(\DateTime|int $start, \DateTime|int $end): int {

        return abs($this->getGap($end) - $this->getGap($start)) + (int) is_int($start);
    }

    public function getTimeDuration(\DateTime $start, \DateTime $end): string
    {
        $diff = date_diff($start, $end);

        return $diff->format('%H:%I');
    }

    public function formatDate(\DateTime $date): string
    {
        list($n, $d, $m) = explode(':', date_format($date, 'N:d:m'));

        $n = $this->formatDayOfWeek(++$n %7);

        return "$n $d/$m";
    }

    public function formatHour(\DateTime $time): string
    {
        list($h, $m) = explode(':', date_format($time, 'G:i'));

        return $h .'h'. $m;
        /*
        if ($this->getLocale() === 'fr')
        {
            return $h .'h '. $m;

        } else {
            if ((int) $h > 12)
            {
                return ($h - 12) .':'. $m . 'pm';

            } else {
                return $h .':'. $m . 'am';
            }
        }
        */
    }

    public function dateToPaneTitle(\DateTime $date): string
    {
        return date_format($date, 'j/m');
    }

    public function formatDayOfWeek(int $day): string|false
    {
        $days = [
            'fr' => ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
            //'en' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        ];

        if (key_exists($this->getLocale(), $days)) {
            $locale = $this->getLocale();
        } else {
            $locale = self::DEFAULT_LOCALE;
        }

        if ($day >= 0 && $day < 8)
        {
            return $days[$locale][$day];

        } else {

            return false;
        }
    }
}
