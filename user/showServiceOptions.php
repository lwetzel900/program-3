<?php include '../view/header.php'; ?>
<main>
    <br>

    <form action="" method="post">
        <input type="hidden" name="action" value="selectServices"

        <h2>Select a service</h2>

        <table>
            <tr>

                <th>Service Type</th>
                <th>Description</th>
                <!--<th>Picture</th>-->
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($venueServices as $service) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($service['serviceType']) ?></td>
                    <td><?php echo htmlspecialchars($service['serviceDescription']) ?></td>
                    <!--<td><image src="<?php echo htmlspecialchars($service['servicePic']); ?>" height="120" width="180"</td>-->

                    <td>
                        <!--                    <form action="." method="post">
                                                <input type="hidden" name="action" value="selectServices">
                                                <input type="hidden" name="serviceID" value="<?php echo htmlspecialchars($service['serviceID']); ?>">-->
                            <!--                        <input type="hidden" name="imageID"
                                                       value="<?php echo htmlspecialchars($pic['imageID']); ?>">-->
                        <input type="checkbox" name="services[]" value="<?php echo htmlspecialchars($service['serviceID']); ?>">
                        <!--                    </form>-->
                    </td>
                </tr>
            <?php endforeach; ?>
        </table><br>


        <input type="submit" value="Select">
    </form>
    <p><a href=".?action=logout">Logout</a></p>
</main>
<?php include '../view/footer.php'; ?>