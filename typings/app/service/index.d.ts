// This file is created by egg-ts-helper
// Do not modify this file!!!!!!!!!

import 'egg';
import ExportArticle from '../../../app/service/Article';
import ExportTest from '../../../app/service/Test';

declare module 'egg' {
  interface IService {
    article: ExportArticle;
    test: ExportTest;
  }
}
