<?php include 'view/header.php'; ?>
<main>
    <br>
    <table>
        <tr>
            <!--<th>ID</th>-->
            <th>Service Type</th>
            <th>Description</th>
            <!--<th>Picture</th>-->
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($allServices as $service) : ?>
            <tr>
                <!--<td><?php echo htmlspecialchars($service['serviceID']) ?></td>-->
                <td><?php echo htmlspecialchars($service['serviceType']) ?></td>
                <td><?php echo htmlspecialchars($service['serviceDescription']) ?></td>
                <!--<td><image src="<?php echo htmlspecialchars($service['servicePic']); ?>" height="120" width="180"</td>-->

                <td><form action="." method="post">
                        <input type="hidden" name="action" value="deleteService">
                        <input type="hidden" name="serviceID" value="<?php echo htmlspecialchars($service['serviceID']); ?>">
    <!--                        <input type="hidden" name="imageID"
                               value="<?php echo htmlspecialchars($pic['imageID']); ?>">-->
                        <input type="submit" value="Delete">
                    </form></td>
            </tr>
        <?php endforeach; ?>
    </table><br>
    <p>Add services below</p>
    <form action="" method="post" id="aligned">
        
        <input type="hidden" name="action" value="serviceAdd">

        <label>Service Type:</label>
        <input type="text" name="type"> 
        <br>
        <label>Description:</label>
        <input type="text" name="description"> 
        <br>
        <!--        <label>Picture:</label>
                <input type="text" name="pic"> 
                <br>-->

        <label>&nbsp;</label>
        <input type="submit" value="Update"><br>

    </form>
    <p><a href=".?action=adminWork">Admin Home</a> </p>
</main>

<?php include 'view/footer.php'; ?>