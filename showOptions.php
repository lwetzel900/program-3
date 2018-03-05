<?php include 'view/header.php'; ?>
<main>
    <br>
   

    <h2>Select a venue</h2>

    <table>
        <tr>
            <!--<th>ID</th>-->
            <th>Venue Name</th>
            <th>City</th>
            <th>State</th>
            <!--<th>Picture</th>-->
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($allVenues as $venue) : ?>
            <tr>
                <!--<td><?php echo htmlspecialchars($venue['venueID']) ?></td>-->
                <td><?php echo htmlspecialchars($venue['name']) ?></td>
                <td><?php echo htmlspecialchars($venue['city']) ?></td>
                <td><?php echo htmlspecialchars($venue['state']) ?></td>
                <!--<td><image src="<?php echo htmlspecialchars($venue['venuePic']); ?>" height="120" width="180"</td>-->

                <td><form action="." method="post">
                        <input type="hidden" name="action" value="selectVenue">
                        <input type="hidden" name="venueID" value="<?php echo htmlspecialchars($venue['venueID']); ?>">
    <!--                        <input type="hidden" name="imageID"
                               value="<?php echo htmlspecialchars($pic['imageID']); ?>">-->
                        <input type="submit" value="Select">
                    </form></td>
            </tr>
        <?php endforeach; ?>
    </table><br>

    <h2>Select a service</h2>

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
                        <input type="hidden" name="action" value="selectServices">
                        <input type="hidden" name="serviceID" value="<?php echo htmlspecialchars($service['serviceID']); ?>">
    <!--                        <input type="hidden" name="imageID"
                               value="<?php echo htmlspecialchars($pic['imageID']); ?>">-->
                        <input type="submit" value="Select">
                    </form></td>
            </tr>
        <?php endforeach; ?>
    </table><br>
    
    <p><a href=".?action=logout">Logout</a></p>
</main>
<?php include 'view/footer.php'; ?>