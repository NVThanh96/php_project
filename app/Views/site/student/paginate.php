<style>

    .Items {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    /* Style for the pagination links */
    .Items a {
        color: #333;
        text-decoration: none;
        padding: 5px 10px;
        margin: 0 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Style for the active pagination link */
    .Items a.active {
        background-color: #333;
        color: #fff;
    }
</style>

<div class="Items">

    <?php

    $pageURL = "";

    if ($page_number >= 2) {

        echo "<a href='student?page=" . ($page_number - 1) . "'>  Prev </a>";

    }

    for ($i = 1; $i <= $total_pages; $i++) {

        if ($i == $page_number) {

            $pageURL .= "<a class = 'active' href='index.php?page="

                . $i . "'>" . $i . " </a>";

        } else {

            $pageURL .= "<a href='student?page=" . $i . "'>  " . $i . " </a>";

        }

    };

    echo $pageURL;

    if ($page_number < $total_pages) {

        echo "<a href='student?page=" . ($page_number + 1) . "'>  Next </a>";

    }

    ?>

</div>