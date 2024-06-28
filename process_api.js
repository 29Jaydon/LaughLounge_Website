const retrieve_meme_btn = document.querySelector(".main .btn");
const image_meme = document.querySelector(".main img");
const title_meme = document.querySelector(".main .title");
const author_meme = document.querySelector(".main h3");
const subreddit_meme = document.querySelector(".main .subreddit");

const update_info = (url, title, author, subreddit) =>{
    image_meme.setAttribute("src",url);
    title_meme.innerHTML = `Title of meme: ${title}`;
    author_meme.innerHTML = `Author of meme: ${author}`;
    subreddit_meme.innerHTML =`Subreddit where meme was posted: ${subreddit}`;
}

const retrieve_meme = () => {
    fetch("https://meme-api.com/gimme/wholesomememes")
    .then((response) => response.json())
    .then((data) => {update_info(data.url, data.title, data.author, data.subreddit)})
};

retrieve_meme_btn.addEventListener("click", retrieve_meme);
retrieve_meme();
