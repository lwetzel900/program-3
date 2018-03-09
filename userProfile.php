<?php include 'view/header.php'; ?>
<main>
    <br>
    <p>Welcome <?php echo htmlspecialchars("$fName $lName") ?></p>
    <br>
    <?PHP if (empty($allTogether)) : ?>
        <p>You haven't picked out anything yet...</p>
        <br>
        <p>Please choose some <a href=".?action=showOptions">options</a> from our venues and services</p>
        <br>
    <?php else: ?>
        <p>your options</p>
        <br>
        <table>
            <tr>
                <?php foreach ($allTogether as $key => $something) : ?>
                    <th><?php echo htmlspecialchars("$key") ?></th>
                <?php endforeach; ?>
                    <th>&nbsp;</th>
            </tr>
            <?php foreach ($allTogether as $row) : ?>
                <tr>
                    <?php foreach ($row as $key => $val): ?>
                        <td><?php echo htmlspecialchars("$val") ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <?PHP endif; ?>
    <br>
    <p><a href=".?action=showOptions">options</a></p>
    <p><a href=".?action=logout">Logout</a></p>
</main>
<?php include 'view/footer.php'; ?>
