<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
</head>
<body>
    <?php foreach ($posts as $post) { ?>
        <article>
            <h1>
                <a href="<?php echo '/posts/' . $post->slug; ?>">
                <?php echo $post->title; ?>
                </a>
            </h1>
            <div>
                <?php echo $post->body; ?>
            </div>
        </article>
    <?php } ?>
</body>
</html>
