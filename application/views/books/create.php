<h2>Create a books item</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('books/create') ?>
<label for="title">Title</label>
<input type="input" name="title" /><br />
<label for="text">Text</label>
<textarea name="text"></textarea><br />
<input type="submit" name="submit" value="Create books item" />
</form>