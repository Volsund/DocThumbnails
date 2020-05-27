# Document Thumbnails

Document thumbnail single page application.

## Installation

1.run ``` composer install ``` to generate depedencies in vendor folder

2.change ```.env.example``` to ``` .env```

3.run ```php artisan key:generate```

4.configure ```.env```



## Usage
Possibility to upload .pdf document. 

Preview after clicking on thumbnail and the possibility to download.

![Alt Text](https://media.giphy.com/media/ZE5TWclP6GKL40ehsy/giphy.gif)


## ToDo Improvements
1. Fix file storage, so files are not stored directly in the public maps.
2. Add extra routes.
3. Divide controller duties into more-specific controllers.
4. Add responsivity for mobile devices.
