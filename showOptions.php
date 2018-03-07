<?php include 'view/header.php'; ?>
<main>
    <br>

    <form action="?action=userProfileAfterOptions" method="post">
    <h2>Select a venue</h2>

    <table>
        <tr>
            <th>Venue Name</th>
            <th>City</th>
            <th>State</th>
            <!--<th>Picture</th>-->
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($allVenues as $venue) : ?>
            <tr>
                <td><?php echo htmlspecialchars($venue['name']) ?></td>
                <td><?php echo htmlspecialchars($venue['city']) ?></td>
                <td><?php echo htmlspecialchars($venue['state']) ?></td>
                <!--<td><image src="<?php echo htmlspecialchars($venue['venuePic']); ?>" height="120" width="180"</td>-->

                <td>
                    <!--<form action="." method="post">-->
                        <!--<input type="hidden" name="action" value="selectVenue">-->
                        <!--<input type="hidden" name="venueID" value="<?php echo htmlspecialchars($venue['venueID']); ?>">-->
    <!--                        <input type="hidden" name="imageID"
                               value="<?php echo htmlspecialchars($pic['imageID']); ?>">-->
                        <input type="radio" name="venue" value="<?php echo htmlspecialchars($venue['venueID']); ?>">
                    <!--</form>-->
</td>
            </tr>
        <?php endforeach; ?>
    </table><br>

    <h2>Select a service</h2>

    <table>
        <tr>

            <th>Service Type</th>
            <th>Description</th>
            <!--<th>Picture</th>-->
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($allServices as $service) : ?>
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
    
    <!--<input type="hidden" name="action" value="selectService">-->
    <input type="submit" value="Select">
</form>
    <p><a href=".?action=logout">Logout</a></p>
</main>
<?php include 'view/footer.php'; ?>