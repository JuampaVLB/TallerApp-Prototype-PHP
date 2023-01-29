'use strict';

const container = document.querySelector('#container');
const modal = document.querySelector('.modal-container');
const search = document.querySelector('.search_tool');
const input_search = document.querySelector('.input-search');

search.addEventListener('click', () => {
    
    container.classList.toggle('active');
    modal.classList.toggle('active');
    input_search.classList.toggle('active');
    
    modal.addEventListener('click', (e) => {
        let target = e.target;
            if(target == modal) {
                container.classList.remove('active');
                modal.classList.remove('active');
                input_search.classList.remove('active');
            }
    })

    
    
})