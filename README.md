# Vlab

Vlab is a platform that will enable equitable virtual access and near-real life experience of conducting some basic experiments and use of virtual tools that have otherwise become difficult to be carried out by ALL first year or second-year science and engineering students in the laboratory within the semester period.

Vlab will be standing on the shoulder of technology giants such as Laravel,<!--Vuejs is spaces out --> Vue js and Bootstrap for development.

## Dependencies

To use this project, you will need to set up your system for development with laravel 7. Check out this [Link](https://laravel.com/docs/7.x/installation) if you <!-- single quote (') is added to dont-->don't have laravel setup on your system.

## Installation

With Laravel and <!--offcourse is changed to of course-->of course git setup on your system, follow the below steps:

-   Clone this repo by entering `git clone https://github.com/cs-dept-ibbul/vlab.git` into your terminal.
-   Enter your newly cloned project directory using `cd vlab`.
-   Create a file named `.env` file and copy the contents of the [.env.example](.env.example) into the new .env file or alternatively rename the `.env.example` file to `.env`.
-   Run `composer install` then `php artisan key:generate` on your terminal/command prompt to generate a secured key for your project as well as download the project dependencies.
-   Run `yarn install && yarn watch` or `npm install && npm run watch` to install the frontend dependencies.
-   Run `php artisan serve` to spin up the development server.

_Check out this [link](https://laravel.com/docs/8.x/structure) to understand the folder structure. <!--BTW frontend codes should reside in is changed to PS: Frontend codes reside in `/reources/js`-->PS: Frontend codes reside in `/resources/js`_

## How to test the software

Follow the installation guide to test this software.

## Getting involved/Contributing

There are two primary ways to help:

-   Using the issue tracker, and
-   Changing the code-base.

### Using the issue tracker

Use the issue tracker to find ways to contribute. Find a bug or a feature, mention in
the issue that you will take on that effort, then follow the _Changing the code-base_
guidance below.

### Changing the code-base

Generally speaking, you should fork this repository, make changes in your
own fork, and then submit a pull request detailing what issue you are solving. All new code should follow our stylistic and architectural setup already exhibited by the project.This basically means all new contributions must mimic the styles and patterns in the <!--sting is changed to single-->single code-base.

_This project will be adopting the Udacity Git Commit Message Style, [Check Here for guidance](http://udacity.github.io/git-styleguide/)_

## License

VLab is licensed under the [MIT License](LICENSE).
