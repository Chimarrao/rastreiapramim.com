const path = require('path');
const TerserPlugin = require('terser-webpack-plugin');
const WebpackBar = require('webpackbar');
const CompressionPlugin = require('compression-webpack-plugin');

module.exports = {
    mode: 'development',
    // mode: 'production',
    entry: './resources/ts/main.ts',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'public/js'),
    },
    resolve: {
        extensions: ['.ts']
    },
    module: {
        rules: [
            {
                test: /\.ts$/,
                use: 'ts-loader',
                exclude: /node_modules/,
            },
            {
                test: /\.css$/,
                use: ['style-loader', 'css-loader'],
            },
        ],
    },
    optimization: {
        minimize: true,
        minimizer: [
            new TerserPlugin({
                terserOptions: {
                    format: {
                        comments: false,
                    },
                    compress: {
                        // drop_console: true,
                        keep_fargs: false,
                        reduce_vars: true,
                        // drop_debugger: true,
                        passes: 10,
                    }
                }
            }),
        ],
    },
    watch: true,
    plugins: [
        new WebpackBar(),
        new CompressionPlugin(),
    ],
};