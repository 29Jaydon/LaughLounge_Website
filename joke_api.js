const retrieve_joke_btn = document.querySelector(".Example .btn");
const joke_setup = document.querySelector(".Example .setup");
const joke_punchline = document.querySelector(".Example .punchline");

const update_info = ( setup, punchline ) =>{
    joke_setup.innerHTML = setup;
    joke_punchline.innerHTML = punchline;
}

const retrieve_joke = () => {
    fetch("https://official-joke-api.appspot.com/random_joke")
    .then((response) => response.json())
    .then((data) => {update_info(data.setup, data.punchline)})
};

retrieve_joke_btn.addEventListener("click", retrieve_joke);
retrieve_joke();
