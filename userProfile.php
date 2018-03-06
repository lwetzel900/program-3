<?php include 'view/header.php'; ?>
<main>
    <br>
    <p>Welcome <?php echo htmlspecialchars("$fName $lName") ?></p><br>
    
    <table>
        <caption>Your Choice</caption>
        <tr>
            <th>Venue Name</th>
            <th>City</th>
            <th>State</th>
            <!--<th>Picture</th>-->
        </tr>

        <?php foreach ($allVenues as $venue) : ?>
            <tr>
                <td><?php echo htmlspecialchars($venue['name']) ?></td>
                <td><?php echo htmlspecialchars($venue['city']) ?></td>
                <td><?php echo htmlspecialchars($venue['state']) ?></td>
                <!--<td><image src="<?php echo htmlspecialchars($venue['venuePic']); ?>" height="120" width="180"</td>-->
            </tr>
        <?php endforeach; ?>
    </table><br>
    
    <p><a href=".?action=showOptions">options</a></p>
    <p><a href=".?action=logout">Logout</a></p>
</main>
<?php include 'view/footer.php'; ?>