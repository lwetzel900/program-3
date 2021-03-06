<?php include '../view/header.php'; ?>
<?php if(!isset($_SESSION)){
    header("Location: .");
}?>
<main>
    <br>
    <table>
        <tr>
            
            <th>Venue Name</th>
            <th>City</th>
            <th>State</th>
            <th>Picture</th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($allVenues as $venue) : ?>
            <tr>
                <td><?php echo htmlspecialchars($venue['name']) ?></td>
                <td><?php echo htmlspecialchars($venue['city']) ?></td>
                <td><?php echo htmlspecialchars($venue['state']) ?></td>
                <td><image src="<?php echo htmlspecialchars('/' . $basedir . '/' . $venue['venuePic']); ?>" 
                           height="40" width="80"</td>

                <td><form action="." method="post">
                        <input type="hidden" name="action" value="deleteVenue">
                        <input type="hidden" name="venueID" 
                               value="<?php echo htmlspecialchars($venue['venueID']); ?>">
                            <input type="hidden" name="imageLocation"
                               value="<?php echo htmlspecialchars('/' . $venue['venuePic']); ?>">
                        <input type="submit" value="Delete">
                    </form></td>
            </tr>
        <?php endforeach; ?>
    </table><br>
    <p>Add venues below</p>
    <form action="" method="post" id="aligned" enctype="multipart/form-data">
        <!--for the control-->
        <input type="hidden" name="action" value="venueAdd">

        <label>Venue Name:</label>
        <input type="text" name="name"><br>
        
        <label>City:</label>
        <input type="text" name="city"><br>
        
        <label>State:</label>
        <input type="text" name="state"><br>
        
                <label>Picture:</label>
                <input type="file" name="image"> 
                <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Venue"><br>
    </form><br>
    
    <p><a href=".?action=adminWork">Admin Home</a> </p>
    <p><a href=".?action=logout">Logout</a></p>
</main>

<?php include '../view/footer.php'; ?>

