<!-- Example of a form field -->
<label for="name">Name:</label>
<input type="text" name="name" id="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
<?php if (isset($errors['name'])) echo '<span class="error">' . $errors['name'] . '</span>'; ?>
