const path = require('path')
const HtmlWebpackPlugin = require('html-webpack-plugin')

module.exports = {
  mode: 'development',

  context: path.join(__dirname, './src'),

  entry: './index.js',

  output: {
    filename: 'app.[hash].js',
    path: path.join(__dirname,'./dist')
  },

  devtool: 'source-map',

  module: {
    rules: [
      {
        test: /\.ts$/,
        use: ['ts-loader']
      }
    ]
  },

  devServer: {
    publicPath: '/',
    port: '3002',
    hot: true
  },

  plugins: [
    new HtmlWebpackPlugin({
      filename: 'index.html',
      template: path.join(__dirname, './index.html'),
      inject: true
    })
  ]
}