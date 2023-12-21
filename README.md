# 🎮 RepacksDB API 🕹️

The RepacksDB API is a Laravel-based project that provides access to a collection of games. Explore, search, and filter games with ease!

## 📦 Features

- **Retrieve All Games:** Get a list of all available games.

- **Search by Title:** Find games by their titles.

- **Filter by Genres:** Filter games based on genre tags.

- **Filter by Languages:** Filter games based on supported languages.

- **Filter by Size:** Filter games based on their original and repack sizes.

- **Filter by Repacker:** Filter games based on their repacker.

- **Advanced Search:** Customize your search with various criteria like company, original size, repack size, and more.

## 🚀 Getting Started

1. Clone this repository.
2. Configure your database settings in `.env`.
3. Start the development server: `php artisan serve`.

## 📃 API Endpoints

- `/games`: Retrieve all games.
- `/games/{game_id}`: Get a specific game by ID.
- `/games/search/{title}`: Search for games by title.
- `/games/genre/{genre}`: Filter games by genre.
- `/games/language/{language}`: Filter games by supported language.
- `/games/size/{size}`: Filter games by original or repack size.
- `/games/repacker/{repacker}`: Filter games by repacker.
- `/games/advanced-search`: Advanced search with customizable criteria.

## 📝 Contributions

Contributions are welcome! Feel free to open issues and submit pull requests to improve the project.

## 👤 Author

[NotCoderGuy](https://notcoderguy.com)

## 📄 License

This project is licensed under the [MIT License](LICENSE).

Enjoy exploring the world of games with the Game Catalog API! 🎮
