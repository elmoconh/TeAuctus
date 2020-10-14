import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'bot'
})
export class BotPipe implements PipeTransform {

  transform(value: unknown, ...args: unknown[]): unknown {
    return null;
  }

}
