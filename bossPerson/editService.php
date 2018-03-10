<?php include '../view/header.php'; ?>
<main>
    <form action='' method='post' id="aligned">
        <input type='hidden' name='action' value='serviceUpdate.php'>

        <label>Type: </label>
        <input type='text' name='type' value='<?php echo htmlspecialchars($type) ?>'><br>

        <label>Description: </label>
        <textarea cols="21" rows="5" name='description' ><?php echo htmlspecialchars($desription) ?></textarea><br><br>

        <label>Currently offered at: </label>
        <textarea readonly="true"><?php foreach ($name as $n) : ?><?php echo htmlspecialchars($n) ?>, <?php endforeach; ?></textarea>          
        <br>

        <label>Venue Offered:</label>
        <select name="venueSelect">
            <?php foreach ($allVenues as $ven) : ?>
                <option value="<?php echo htmlspecialchars($ven['venueID']) ?>">
                    <?php echo htmlspecialchars($ven['name']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <label>&nbsp;</label>
        <input type="submit" value="Update">
    </form>


</main>
<?php include '../view/footer.php'; ?>
