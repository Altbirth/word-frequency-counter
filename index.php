<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Word Frequency Counter</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Word Frequency Counter</h1>
    <form method="post">
        <label for="text">Paste your text here:</label><br>
        <textarea id="text" name="text" rows="10" cols="50" required><?php echo isset($_POST['text']) ? htmlspecialchars($_POST['text']) : ''; ?></textarea><br><br>
        
        <label for="sort">Sort by frequency:</label>
        <select id="sort" name="sort">
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select><br><br>

        <label for="WordLimit">Number of Words to Display:</label>
        <input type="number" id="WordLimit" name="WordLimit" value="10" min="1"><br><br>

        <input type="submit" value="Calculate Word Frequency">
        <input type="button" name="reset" value="Reset" onclick="document.getElementById('text').value = '';">
    </form>
    </form>


<form>
<?php
function tokenizeText($text) {
    // Convert text to lowercase and tokenize into words
    $text = strtolower($text);
    return str_word_count($text, 1);
}

function removeStopWords($words) {
    // Define common stop words
    $stopWords = ["the", "and", "in"];

    // Remove stop words
    return array_diff($words, $stopWords);
}

// Function to calculate word frequency
function calWordFrequency($text) {
    $words = tokenizeText($text);
    $filteredWords = removeStopWords($words);
    return array_count_values($filteredWords);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputText = $_POST["text"];
    $sortOrder = $_POST["sort"];
    $displayLimit = $_POST["WordLimit"];

    $wordFrequencies = calWordFrequency($inputText);


    // sort word frequency based on user's choice.
    if ($sortOrder == "asc") {
        asort($wordFrequencies);
    } else {
        arsort($wordFrequencies);
    }
    
    // Output the results in a styled table
    echo "<h2>Word Frequencies:</h2>";
    echo "<table class='center'>" ;
    echo "<tr><th>Word</th><th>Frequency</th></tr>";

    $count = 0;
    foreach ($wordFrequencies as $word => $frequency) {
        echo "<tr><td>$word</td><td>$frequency</td></tr>";
        $count++;
        if ($count >= $displayLimit) {
            break;
        }
    }

    echo "</table>";
}

?>

       </form>
</body>
</html>
