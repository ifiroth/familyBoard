(window.onload = () => {
    const oForms = document.querySelectorAll('form.plannedActivityForm')



    oForms.forEach((oForm) => {
        const oEventTypeChoice = oForm.querySelector('#flexSwitchCheckDefault')

        const oDayOfWeekInput = oForm.querySelector('#planned_activity_dayOfWeek')
        oDayOfWeekInput.parentElement.setAttribute('data-display', window.getComputedStyle(oDayOfWeekInput.parentElement).display)
        const oDate = oForm.querySelector('#planned_activity_date')
        oDate.parentElement.setAttribute('data-display', window.getComputedStyle(oDate.parentElement).display)
        toggleDisplay(oDayOfWeekInput)

        oEventTypeChoice.addEventListener('change', () => {
            toggleDisplay(oDayOfWeekInput)
            toggleDisplay(oDate)
        })
    })

    function toggleDisplay(element) {

        const oParent = element.parentElement
        const display = oParent.getAttribute('data-display')

        if (window.getComputedStyle(oParent).display === display) {
            oParent.style.display = 'none'
        } else {
            oParent.style.display = display
        }
    }

})
