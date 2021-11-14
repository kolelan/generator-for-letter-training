const path = require('path')
const HTMLWebpackPlugin = require('html-webpack-plugin')
const {CleanWebpackPlugin}=require('clean-webpack-plugin')
const isDev = process.env.NODE_ENV === 'development'
const isProd = !isDev

module.exports = {
  mode: 'development',
  entry: {
    main: './src/index.js',
    analytics: './src/analytics.js'
  },
  output: {
    filename: '[name].[contenthash].js',
    path: path.resolve(__dirname,'dist')
  },
  devServer: {
    port: 8082,
    hot: true
  },
  plugins: [
    new HTMLWebpackPlugin({
      // title: "От руки",
      template: "./src/index.html"
    }),
    new CleanWebpackPlugin()
  ]
}
