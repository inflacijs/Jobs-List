<!-- Šis strādā līdzīgi kā view -->
<?php include 'inc/header.php' ?> 
    <h2 class="page-header">Creaate Job Listing</h2>
    <form method="POST"action="create.php">
        <div class="form-group">
            <label>Company</label>
            <input type="text" class="form-control" name="company">
        </div>
        <div class="form-group">
            <label>Categorie</label>
            <select class="form-control" name="category">
            <?php foreach($categories as $categorie): ?>
                <option value="<?php echo $categorie->id ?>"><?php echo $categorie->name ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Job Title</label>
            <input type="text" class="form-control" name="job_title">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="form-group">
            <label>Location</label>
            <input type="text" class="form-control" name="location">
        </div>
        <div class="form-group">
            <label>Salary</label>
            <input type="text" class="form-control" name="salary">
        </div>
        <div class="form-group">
            <label>Contact User</label>
            <input type="text" class="form-control" name="contact_user">
        </div>
        <div class="form-group">
            <label>Contact Email</label>
            <input type="text" class="form-control" name="contact_email">
        </div>
        <input type="submit" class="btn btn-secondary" value="Submit" name="submit">
        
    </form>
<?php include 'inc/footer.php';?> 