<?php include '../view/header.php'; ?>
<body>
    <p>Please register.</p>
    <h2><?php echo htmlspecialchars($errorMessage) ?></h2>
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="addUser">
        
        <label for="firstName">First Name: </label>
        <input type="text" name="firstName" ><br>
        
        <label for="lastName">Last Name: </label>
        <input type="text" name="lastName" ><br>

        <label for="email">Email Address: </label>
        <input type="text" name="email" ><br>

        <label for="address">Address: </label>
        <input type="text" name="address" ><br>

        <label for="city">City: </label>
        <input type="text" name="city" ><br>

        <label for="zip">Zip: </label>
        <input type="text" name="zip" placeholder="00000" ><br>

        <label for="phone">Phone: </label>
        <input type="text" name="phone" placeholder="123-456-7890" ><br>

        <label for="password">Password: </label>
        <input type="text" name="password" ><br>

        <label>&nbsp;</label>
        <input type="submit" value="Register">
    </form>
    <br><p><a href=".?action=logout">Home</a></p><br>
</body>
<?php include '../view/footer.php'; ?>

