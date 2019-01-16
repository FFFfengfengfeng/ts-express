import 'egg';

declare module 'egg' {
    interface Application {
        mysql,
        cors
    }
}