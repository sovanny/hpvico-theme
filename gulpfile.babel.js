import { src, dest } from 'gulp';
import webpack from 'webpack-stream';

export const scripts = () => {
  return src('js/*.js')
    .pipe(webpack({
      module: {
      rules: [
        {
          test: /\.js$/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/preset-env'],
            }
          }
        }
        ]
      },
      mode: 'development',
      devtool: false,
      output: {
        filename: '[name].js'
      },
    }))
    .pipe(dest('dist/js'));
}


export default scripts;