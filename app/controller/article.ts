import { Controller } from 'egg';

export default class ArticleController extends Controller {
    public async list() {
        const { ctx } = this;

        const list = await ctx.service.article.list();
    
        ctx.body = list;
    }
}
