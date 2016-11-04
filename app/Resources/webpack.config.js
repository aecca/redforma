var webpack = require('webpack');
var HtmlWebpackPlugin = require('html-webpack-plugin');
var HtmlWebpackPluginReturn = require('html-webpack-plugin-return');
var ExtractTextPlugin = require('extract-text-webpack-plugin');

var isProd  = (process.env.NODE_ENV == 'production');

var filename = isProd ? '[name].[hash].js' : '[name].bundle.js';
var output = __dirname + '/../../web/assets/';

var plugins = [
    new HtmlWebpackPlugin({
        filename:'base.html.twig',
        template: './views/_layouts/base.html.twig',
        inject: 'body'
    }),
    new HtmlWebpackPlugin({
        filename:'default.html.twig',
        template: './views/_layouts/default.html.twig',
        inject: 'body'
    }),
    new HtmlWebpackPluginReturn({output:output}),
    new webpack.optimize.CommonsChunkPlugin('vendor', filename),
];

if(isProd){
    plugins.push(new webpack.NoErrorsPlugin());
    plugins.push(new webpack.optimize.DedupePlugin());
    plugins.push(new webpack.optimize.UglifyJsPlugin({compress: { warnings: false } }));
    plugins.push(new ExtractTextPlugin('app.[hash].css', {allChunks: true}));
}

module.exports = {
    // devtool : isProd ? 'source-map' : 'eval',
    devtool : isProd ? 'cheap-module-source-map' : 'eval',
    entry   : {
        app     : __dirname + '/src/app.js',
        vendor : ['jquery']
    },
    output  : {
        path      : output,
        publicPath: '/assets/',
        filename  : filename,
        chunkFilename: '[id].[name].min.js'
    },
    plugins: plugins,
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
                loader: isProd ?  ExtractTextPlugin.extract('css-loader') : 'style-loader!css-loader'
            },
            {
                test: /\.scss$/,
                loader: isProd ? ExtractTextPlugin.extract('css-loader!sass-loader') : "style-loader!css-loader!sass-loader"
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