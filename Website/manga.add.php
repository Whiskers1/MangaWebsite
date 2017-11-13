<?php
include "includes/phpfunctions.inc.php";
include "includes/header.php";
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-4 pt-3">
                <form action="includes/mangaSerach.inc.php" method="POST">
                    <div class="form-group">
                        <label>Example select</label>
                        <div>
                            <select class="form-control" name="type" style="height: 40px;">
                                <option value="1">MangaFox</option>
                                <option value="2">Database</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Search word</label>
                        <input type="text" name="text" class="form-control" placeholder="Search word">
                        <small class="form-text text-muted">placeholder</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12 pt-3">
                <div class="list-group">
                    <div id="accordion" role="tablist">
                        <?php
                        if (isset($_SESSION["serach[name]"])) {
                            mangaSerach($_SESSION["serach[name]"], $_SESSION["serach[img]"], $_SESSION["serach[summary]"], $_SESSION["serach[LatestC]"], $_SESSION["serach[HTTP]"], $_SESSION["serach[type]"]);
                        }
                        if (isset($_POST['Submit'])) {
                            AddManga($_POST['mangaName'], $_POST['mangaImg'], $_POST['mangaSummary'], $_POST['mangaChapter'], $_POST['mangaLink'], $_POST['type'], $_SESSION['u_id']);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

<?php
include "includes/footer.php";
?>
