//assets/js/hello.js

const moment = require('moment')
const autocomplete = require('autocompleter')

require('bootstrap');

window.onload = () => {
    let recipes = [
        { label: 'Gateau au chocolat', value: 'GAD' },
        { label: 'Gateau royal à la vanille exquis', value: 'GRAVE' },
        { label: 'Gateau royal obtenu soudainement', value: 'GROS' },
        { label: 'Gateau au yaourt', value: 'GAY' },
    ]

    let oSearch = document.querySelector('.navbar input[type="search"]:first-of-type')

    autocomplete({
        minLength: 1,
        input: oSearch,
        fetch: (text, update) => {
            text = text.toLowerCase()
            let suggestions = recipes.filter(n => n.label.toLowerCase().startsWith(text))
            update(suggestions)
        },
        onSelect: function(item) {
            alert(item.value)
        }
    })

    let oDate = document.querySelector('footer > #date')
    setInterval(() => {
        oDate.innerText = moment().format('MMMM Do YYYY; h:mm:ss a')
    }, 1000)
}
