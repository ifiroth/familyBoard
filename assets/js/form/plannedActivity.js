(window.onload = () => {
    const $ = require('jquery');

    $('form.plannedActivityForm').each(function() {
        $(this).find('.date-row').toggle()
        $(this).find('#planned_activity_switchDate').change(() => {
            $(this).find('.day-of-week-row').toggle()
            $(this).find('.date-row').toggle()
        })
    })
})
