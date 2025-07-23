<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Trash Treasure</title>
    <link rel="stylesheet" href="editProfileStyle.css">
</head>
<body>
    <div class="edit-profile-container">
        <h2>Edit Profile</h2>
        <form action="submit-edit-profile.html" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="profile-pic">Profile Picture</label>
                <input type="file" id="profile-pic" name="profile-pic" accept="image/*">
            </div>
            
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" value="John Doe" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" value="(123) 456-7890" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="123 Main Street, Anytown, USA" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="john.doe@example.com" required>
            </div>

            <button type="submit" class="btn-submit">Save Changes</button>
        </form>
        <a href="profile.php" class="btn-cancel">Cancel</a>
    </div>
</body>
</html>
