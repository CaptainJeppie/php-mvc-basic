function addItem() {

    const textarea = document.getElementById('todoText');

    let text = textarea.value;

    const newCard = document.createElement('div');
    newCard.className = 'col-md-6 col-xxl-4';

    const newCard2 = document.createElement('div');
    newCard2.className = 'card';

    const newCard3 = document.createElement('div');
    newCard3.className = 'card-body';

    const newCardText = document.createElement('p');
    newCardText.innerHTML = text;

    newCard3.appendChild(newCardText);
    newCard2.appendChild(newCard3);
    newCard.appendChild(newCard2);

    const todoList = document.getElementById('itemList');
    todoList.appendChild(newCard);

    textarea.value = '';
}