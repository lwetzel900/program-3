<?php include 'view/header.php'; ?>
<main>
    <p>Here you can upload or delete images from the main gallery.</p>
    <br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Picture</th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($galleryImages as $pic) : ?>
            <tr>
                <td><?php echo htmlspecialchars($pic['imageID']) ?></td>
                <td><image src="<?php echo htmlspecialchars($pic['galleryImages']); ?>" height="120" width="180"</td>

                <td><form action="." method="post">
                        <input type="hidden" name="action"
                               value="deleteImage">
                        <input type="hidden" name="imageLocation"
                               value="<?php echo htmlspecialchars($pic['galleryImages']); ?>">
                        <input type="hidden" name="imageID"
                               value="<?php echo htmlspecialchars($pic['imageID']); ?>">
                        <input type="submit" value="Delete">
                    </form></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <!--taken from moodle-->
    <form action="" method="POST" enctype="multipart/form-data" id="aligned">
        <input type="hidden" name="action" value="uploadImage"/>
        <input type="file" name="image" /><br>
        <input type="submit"/>
    </form>
    <br><br>
</main>

<?php include 'view/footer.php'; ?>
