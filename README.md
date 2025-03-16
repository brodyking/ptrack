# Pouchtrack

<img src="./assets/logo.png" width="100px" align="left">

This project aims at allowing one to track their nicotine intake, specifically nicotine pouches, to help those quit or try and manage their usage.

**[Documentation](/docs/index.md)** &middot; **[Live Demo](https://pt.benadryl.dev)**


## ⚡ v4.0 Release Notes
v4.0 is a massive rewrite for almost every point on the application. There is almost no compatability between v3.2 and 4.0. Be careful when updating.

- Overhauled Database
  - Now stores user data in json. Much simplier. Check the history of ```data/database.php``` to see what I mean.
  - **NOTE**: You cannot transfer data from v3.2 or below to v4.0

- Overhauled UI: 
  - Single page UI. Every action is done within the `/index.php`
  - Much more organized on the frontend and backend.
  - It is slower, because we are using bootstrap-icons. I may change this in the future if it proves to be a big problem.

- Slight Logo Change


## 📥 Installation

You must have an apache php server, no database is is requierd. I have been using php 8.4 but I assume this will work with most other versions.

You can download or clone this repo.

```bash
git clone https://github.com/brodyking/ptrack.git
```

For a more detailed guide, look at **[Getting Started](/docs/guides/gettingstarted.md)** in the docs.

## 👨‍💻 Roadmap

- [x] Better Databse.

- [x] UI Overhaul.

- [ ] Better Graph/Ability to set time from for graph.

- [ ] Forgot Password/Email.

- [ ] Track money/spending.

## 🖥️ Development

This project was made using [php](https://www.php.net/), [bootstrap](https://getbootstrap.com/) and [chart.js](https://www.chartjs.org/). Without these pieces of software, alot of this would've never been made.

If you would like to contribute, fork it! I doubt anyone wants to touch this dumpster-fire of a codebase but if you feel like it, go ahead!

## 📄 License
```
1. You may copy and modify this software, but may not use this software for commercial purposes.
2. You must show credit to the original repo, [https://github.com/brodyking/ptrack](https://github.com/brodyking/ptrack).
3. These are subject to change. Subsequent changes to new versions apply to older versions (dosent apply to version 2.1 and below).
4. Software is given "as-is", and we are not responsible for any warranty or liability.
```
