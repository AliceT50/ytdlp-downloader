# ytdlp-downloader

## Tiny docker project to download medias from youtube by yt-dlp, with a tiny php webpage.

Originally, I imagine that little tool to download my songs and shows from youtube (with [yt-dlp](https://github.com/yt-dlp/yt-dlp), which is amazing) on my home-server, but without using CLI. I love docker, but I didn't find any sort of projects to do the exact same thing, so i decided to create this one.

I assume, only for the webpage, I used ChatGPT 3.5 (because HTML/CSS/PHP aren't in my skills, particullary PHP which I didn't touch before). Dockerfile was made with hands and love (only to take good time working on a little project, enough to be satisfied).

## How to install ytdlp-downloader

/!\ I don't mention it, but requirements to use this are : `docker`.

First of all, you're gonna need to copy the github content with :

    git clone https://github.com/AliceT50/ytdlp-downloader.git

Theoretically, you could see in the current directory (where you used the command) a new directory named `ytdlp-downloader`, so you need to go in, and build the image (but you could also modify it, or the index.php if you want) :

    docker build -t ytdlp-downloader:latest .

After a bit of time (approximately 5 minutes, depend of your computer and your connection), the image could be build ! Nice job !

## Deploy the image (build just before)

To deploy the image you build, you need to do some little things. A directory with write autorisations you need, to accomplish the deployment you do !

    mkdir /path/of/directory && chmod 777 /path/of/directory

This is important because it's going to be your only gate to move and copy songs and videos you downloaded.

After this, you could deploy ytdlp-downloader :

    docker run -d \
        -p 8889:80 \
        -v /path/of/directory:/srv \
        --name ytdlp-downloader \
        ytdlp-downloader:latest

