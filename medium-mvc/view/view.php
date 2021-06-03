<p>
    <a href="index.php" class="btn btn-default">Return to posts</a>
</p>
<h1><?php if (!empty($post)) {
        echo $post->title;
    } ?></h1>
<p><?php if (!empty($post)) {
        echo $post->created;
    } ?></p>
<p><?php if (!empty($post)) {
        echo $post->teaser;
    } ?></p>
<p><?php if (!empty($post)) {
        echo $post->content;
    } ?></p>