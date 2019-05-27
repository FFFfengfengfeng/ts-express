import { Controller } from 'egg';

export default class HomeController extends Controller {
    public async index() {
        const { ctx } = this;
        return await ctx.render('hello.ejs', {
            data: 'world!'
        })
    }
}
