const path = require('path');
const webpack = require('webpack');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserPlugin = require("terser-webpack-plugin");

module.exports = {
   entry: {
      app: './Resources/Private/Assets/JavaScript/app.js',
   },
   output: {
      path: path.resolve(__dirname, "Resources/Public/Build"),
      filename: "JavaScript/[name].js",
      clean: true,
      assetModuleFilename: 'Assets/[name].[hash][ext][query]',
      publicPath: '/typo3conf/ext/sitepackage/Resources/Public/Build/'
   },
   plugins: [
      new webpack.ProgressPlugin(),
      new MiniCssExtractPlugin({
        filename: "Css/[name].css",
      }),
   ],
   module: {
      rules: [
         {
            test: /\.m?js$/,
            exclude: /(node_modules|bower_components)/,
            loader: "babel-loader",
         },
         {
            test: /\.s[ac]ss$/i,
            use: [
               {
                  loader: MiniCssExtractPlugin.loader,
               },
               {
                  loader: "css-loader",
                  options: {
                     importLoaders: 2,
                     sourceMap: true,
                     url: true,
                  }
               },
               {
                  loader: "postcss-loader",
               },
               {
                  loader: "sass-loader",
                  options: {
                     sourceMap: true,
                  },
               },
            ],
         },
         {
            test: /\.(png|svg|jpe?g|gif)$/,
            type: 'asset/resource',
            generator: {
               filename: 'Images/[name].[hash][ext][query]'
            }
         },
         {
            test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
            type: 'asset/resource',
            generator: {
               filename: 'Fonts/[name].[hash][ext][query]'
            }
         },
      ],
   },

   optimization: {
      splitChunks: {
         cacheGroups: {
            commons: {
               test: /[\\/]node_modules[\\/]/,
               name: "vendor",
               chunks: "initial",
            },
         },
      },
      minimizer: [
        new TerserPlugin({
          terserOptions: {
            format: {
              comments: false,
            },
          },
          extractComments: false,
          parallel: true,
        }),
      ],
   },
   resolve: {
      extensions: [".ts", ".tsx", ".js", ".vue", ".json"],
      modules: ["node_modules"],
      alias: {
         "@": path.resolve(
            __dirname,
            "Resources",
            "Private",
            "Assets",
            "JavaScript"
         ),
      },
   },
}
