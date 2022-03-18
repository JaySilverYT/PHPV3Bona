document.addEventListener('DOMContentLoaded',()=>{

    let input, hashtagArray, container, t;

    input = document.querySelector('#hashtags');
    container = document.querySelector('.tag-container');
    hashtagArray = [];

    input.addEventListener('keydown', (event) => {
        if (event.which == 13 && input.value.length > 0) {
            if(input.value[0] != "#"){
                input.value = "#" + input.value;
            }
            var text = document.createTextNode(input.value);
            hashtagArray.push(input.value);

            var p = document.createElement('p');

            container.appendChild(p);

            p.style.margin="6px";

            p.appendChild(text);
            p.classList.add('badge');
            p.classList.add('badge-default');
            input.value = '';
            
            let deleteTags = document.querySelectorAll('.badge');
            
            for(let i = 0; i < deleteTags.length; i++) {
                deleteTags[i].addEventListener('click', () => {
                container.removeChild(deleteTags[i]);
                hashtagArray.splice(i); //elimina objeto del array
                });
            }

            event.preventDefault();
        }
    });

    let form = document.querySelector('#forms4');
    form.addEventListener('submit',(event)=>{
        let inputHash = document.querySelector('#hiddenHash');
        inputHash.value = JSON.stringify(hashtagArray);
    });

});