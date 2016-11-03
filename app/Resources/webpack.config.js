var webpack = require('webpack');
module.exports = {
    context : __dirname + '/src',
    entry   : {
        app     : __dirname + '/src/app.js',
        vendor : ['jquery']
    },
    output  : {
        path      : __dirname + '/../../web/assets/',
        publicPath: '/assets/',
        filename  : '[name].min.js',
        chunkFilename: '[id].[name].min.js'
    },
    plugins: [
        new webpack.optimize.CommonsChunkPlugin('vendor', '[name].min.js')
    ],
    module: {
        loaders: [
            {
                test: /\.js$/,
                loader: "babel",
                query:{presets:['es2015']},
                exclude:/node_modules/
            },
            {
                test: /\.css?$/,
                loaders: [ 'style','css']
            },
            {
                test: /\.scss$/,
                loaders: ["style", "css", "sass"]
            },
            {
                test: /\.(eot|svg|ttf|woff|woff2|png|jpg)$/,
                loader: 'file'
            }
        ]
    },
    devServer: {
        progress: true,
        hot: true,
        inline: true,
        port: 8080,
        proxy: {
            '*': {
                target: 'http://localhost:8000',
                secure: false,
                changeOrigin: true
            }
        }
    },
};