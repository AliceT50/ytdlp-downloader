<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yt-dlp Downloader - main</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
	
	footer {
		margin-left: 25px;
	}
        header {
            background-color: #4CAF50;
            padding: 15px;
            text-align: center;
            color: white;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #ffffff;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        pre {
            background-color: #f0f0f0;
            padding: 10px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <header>
        <h1>Yt-dlp Downloader</h1>
    </header>

    <div class="container">
        <form action="" method="post">
            <label for="video_link">Insert the link of a youtube media :</label><br>
            <input type="text" id="video_link" name="video_link" required><br><br>
            <input type="submit" name="video-1" value="Download video">
            <input type="submit" name="audio-1" value="Download audio">
        </form>
    <?php
    if(isset($_POST['video-1'])) {
        $video_link = $_POST['video_link'];
        // Échapper les caractères spéciaux pour des raisons de sécurité
        $video_link = escapeshellarg($video_link);
        
        // Commande pour télécharger la vidéo avec yt-dlp
        $runytdlp1 = 'yt-dlp -o "/srv/%(title)s.%(ext)s" --format bestvideo+bestaudio --merge-output-format mp4 --embed-metadata --embed-thumbnail ' . $video_link;

        // Exécution de la commande
        $output = shell_exec($runytdlp1);

        // Affichage du résultat
        echo "<pre>$output</pre>";
    }
    
    if(isset($_POST['audio-1'])) {
        $video_link = $_POST['video_link'];
        // Échapper les caractères spéciaux pour des raisons de sécurité
        $video_link = escapeshellarg($video_link);
        
        // Commande pour télécharger la vidéo avec yt-dlp
        $runytdlp2 = 'yt-dlp -o "/srv/%(title)s.%(ext)s" --extract-audio --audio-format mp3 --audio-quality 0 --embed-metadata --embed-thumbnail ' . $video_link;

        // Exécution de la commande
        $output = shell_exec($runytdlp2);

        // Affichage du résultat
        echo "<pre>$output</pre>";
    }
    ?>
    </div>

    <footer>
        <p>2024 - Yt-dlp Downloader</p>
    </footer>
</body>
</html>
