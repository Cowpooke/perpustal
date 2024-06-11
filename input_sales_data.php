<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style/styles.css">
    </head>
    <body>
        <div class="box">
            <form action="save_sales_data.php" method="POST">
                <div class="Header">
                    <h2>INPUT DATA</h2>
                </div>
                <div class="text">Customer Name</div>
                <div class="input_text">
                    <input type="text" name="name" required>
                </div>
                <div class="text">Phone</div>
                <div class="input_text">
                    <input type="text" name="phone" required>
                </div>
                <div class="text">drug_id</div>
                <div class="input_text">
                    <input type="text" name="drug_id" required>
                </div>
                <div class="text">Quantities</div>
                <div class="input_text">
                    <input type="text" name="quantities" required>
                </div>
                <button type="submit">
                    <div class="button-submit">
                        SUBMIT
                    </div>
                </button>
            </form>
            <a onclick="history.back()">
                <div class="button">
                    BACK TO MENU
                </div>
            </a>
        </div>
    </body>
</html>