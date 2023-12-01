<nav>
    <a href="index.php">🏠 accueil</a>
    <a href="adminer.php?sqlite=&username=admin&db=db%2Frecipes.db&select=ingredient">🥕 ingrédients</a>
    <a href="adminer.php?sqlite=&username=admin&db=db%2Frecipes.db&select=recipe">📖 recettes</a>
</nav>

<style>
    nav {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        display: flex;
        justify-content: center;
    }

    nav a {
        flex: 1;
        padding: 15px;
        position: relative;
        text-align: center;
        text-decoration: none;
    }

    nav a:hover {
        background-color: yellow;
    }

    nav a:not(:last-of-type):after {
        content: "|";
        width: 1ch;
        right: -.5ch;
        position: absolute;
    }
</style>