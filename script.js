document.addEventListener("DOMContentLoaded", function() {
    var articles = document.querySelectorAll('#article-list .article');
    
    articles.forEach(function(article) {
        article.addEventListener('click', function() {
            alert("Vous avez cliqué sur un article !");
        });
    });
});
