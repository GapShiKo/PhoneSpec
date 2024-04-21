<script>
    var visitedPages = JSON.parse(sessionStorage.getItem('visited_pages')) || [];
    visitedPages.push(window.location.pathname);
    sessionStorage.setItem('visited_pages', JSON.stringify(visitedPages));
</script>
