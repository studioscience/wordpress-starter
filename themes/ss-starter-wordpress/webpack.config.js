const path = require("path");

const { CleanWebpackPlugin } = require("clean-webpack-plugin"); // cleans the dist folder after each build
const MiniCssExtractPlugin = require("mini-css-extract-plugin"); // extracts an actual css file from default js
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin"); // removes duplicat scss
const RemoveEmptyScriptsPlugin = require("webpack-remove-empty-scripts"); // removes empty style js file
const TerserJSPlugin = require("terser-webpack-plugin"); // retains js optimization
const ESLintPlugin = require("eslint-webpack-plugin"); // js linter
const StylelintPlugin = require("stylelint-webpack-plugin"); // css/scss linter

module.exports = {
  mode: "development",
  stats: "minimal",
  entry: {
    scripts: "./assets/js/global.js",
    adminjs: "./assets/js/utils/admin.js",
    styles: "./assets/styles/global.scss",
    admin: "./assets/styles/admin.scss",
  },
  output: {
    path: path.resolve(__dirname, "./dist"),
    filename: "[name].min.js",
  },
  devServer: {
    static: "./dist",
  },
  plugins: [
    new CleanWebpackPlugin(),
    new MiniCssExtractPlugin({
      filename: "[name].min.css",
    }),
    new RemoveEmptyScriptsPlugin(),
    new ESLintPlugin(),
    new StylelintPlugin(),
  ],
  module: {
    rules: [
      // JavaScript
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: ["babel-loader"],
      },
      // CSS and Sass
      {
        test: /\.(scss|css)$/,
        use: [
          MiniCssExtractPlugin.loader,
          "css-loader",
          "postcss-loader",
          "sass-loader",
        ],
      },
    ],
  },
  optimization: {
    minimizer: [new CssMinimizerPlugin(), new TerserJSPlugin()],
  },
  resolve: {
    alias: {
      assets: path.resolve(__dirname, "./assets"),
      blocks: path.resolve(__dirname, "./blocks"),
      "template-parts": path.resolve(__dirname, "./template-parts"),
      "hero-stories": path.resolve(__dirname, "./hero-stories"),
    },
  },
};
