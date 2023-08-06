---
layout: layouts/base.njk
eleventyNavigation:
  key: Registration Page
  order: 3
---
# Registration Page

This is where you can register on my Blog.


<?php

require 'database/database.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['title'] == '') {
        $errors[] = 'Title is required';
    }
    if ($_POST['content'] == '') {
        $errors[] = 'Content is required';
    }

    if (empty($errors)) {
        $sql =
            'INSERT INTO article (title, content, published_at) VALUES (?, ?, ?)';

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {
            echo mysqli_error($conn);
        } else {
            mysqli_stmt_bind_param(
                $stmt,
                'sss',
                $_POST['title'],
                $_POST['content'],
                $_POST['published_at']
            );

            if (mysqli_stmt_execute($stmt)) {
                $id = mysqli_insert_id($conn);
                echo "Inserted record with ID: $id";
            } else {
                echo mysqli_stmt_error($stmt);
            }
        }
    }
}
?>

<?php require 'includes/header.php'; ?>

<h2>New article</h2>

<?php if (!empty($errors)): ?>
<ul>
 <?php foreach ($errors as $error): ?>
 <li><?= $error ?></li>
 <?php endforeach; ?>
</ul>
<?php endif; ?>

<form method="post" id="formArticle">

 <div>
  <label for="title">Title</label>
  <input name="title" id="title" placeholder="Article title">
 </div>

 <div>
  <label for="content">Content</label>
  <textarea name="content" rows="4" cols="40" id="content" placeholder="Article content"></textarea>
 </div>

 <div>
  <label for="published_at">Publication date and time</label>
  <input type="datetime-local" name="published_at" id="published_at">
 </div>


 <button>Add</button>

</form>

<?php require 'includes/footer.php'; ?>