<?php
declare(strict_types=1);

const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_PRINT = 3;
const OPERATION_MODIFY = 4;
const OPERATION_QUANTITY = 5;

$operations = [
    OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
    OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
    OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
    OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
    OPERATION_MODIFY => OPERATION_MODIFY . '. Изменить название товара.',
    OPERATION_QUANTITY => OPERATION_QUANTITY . '. Добавить/обновить количество товара.',
];

$items = []; // Structure: ['item_name' => quantity]

/**
 * Отобразить текущее количество товаров в корзине и их количество
 *
 * @param array $items
 * @return void
 */
function displayItems(array $items): void {
    if (count($items)) {
        echo 'Ваш список покупок:' . PHP_EOL;
        foreach ($items as $item => $quantity) {
            echo "$item - Количество: $quantity" . PHP_EOL;
        }
    } else {
        echo 'Ваш список покупок пуст.' . PHP_EOL;
    }
}

/**
 * Попросить пользователя выбрать операцию
 *
 * @param array $operations
 * @return int
 */
function promptForAction(array $operations): int {
    echo 'Выберите операцию для выполнения: ' . PHP_EOL;
    echo implode(PHP_EOL, $operations) . PHP_EOL . '> ';
    $operationNumber = (int) trim(fgets(STDIN));

    if (!array_key_exists($operationNumber, $operations)) {
        echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
        return promptForAction($operations);
    }
    return $operationNumber;
}

/**
 * Добавить товар с количеством в список покупок
 *
 * @param array &$items
 * @return void
 */
function addItem(array &$items): void {
    echo "Введите название товара для добавления в список: \n> ";
    $itemName = trim(fgets(STDIN));
    echo "Введите количество: \n> ";
    $quantity = (int) trim(fgets(STDIN));
    $items[$itemName] = ($items[$itemName] ?? 0) + $quantity;
    echo "Товар \"$itemName\" добавлен в количестве $quantity.\n";
}

/**
 * Удалить товар из списка покупок
 *
 * @param array &$items
 * @return void
 */
function deleteItem(array &$items): void {
    if (empty($items)) {
        echo "Список пуст. Нечего удалять.\n";
        return;
    }

    displayItems($items);
    echo 'Введите название товара для удаления из списка:' . PHP_EOL . '> ';
    $itemName = trim(fgets(STDIN));

    if (isset($items[$itemName])) {
        unset($items[$itemName]);
        echo "Товар \"$itemName\" удален из списка.\n";
    } else {
        echo "Товар \"$itemName\" не найден в списке.\n";
    }
}

/**
 * Отобразить список покупок с количеством товаров
 *
 * @param array $items
 * @return void
 */
function printList(array $items): void {
    displayItems($items);
    echo 'Всего ' . count($items) . ' позиций. ' . PHP_EOL;
    echo 'Нажмите enter для продолжения';
    fgets(STDIN);
}

/**
 * Изменить название товара в списке покупок
 *
 * @param array &$items
 * @return void
 */
function modifyItem(array &$items): void {
    if (empty($items)) {
        echo "Список пуст. Нечего изменять.\n";
        return;
    }

    displayItems($items);
    echo "Введите текущее название товара для изменения:\n> ";
    $currentName = trim(fgets(STDIN));

    if (isset($items[$currentName])) {
        echo "Введите новое название товара:\n> ";
        $newName = trim(fgets(STDIN));
        $items[$newName] = $items[$currentName];
        unset($items[$currentName]);
        echo "Товар \"$currentName\" изменен на \"$newName\".\n";
    } else {
        echo "Товар \"$currentName\" не найден.\n";
    }
}

/**
 * Добавить или обновить количество существующего товара
 *
 * @param array &$items
 * @return void
 */
function addItemQuantity(array &$items): void {
    if (empty($items)) {
        echo "Список пуст. Нечего добавлять.\n";
        return;
    }

    displayItems($items);
    echo "Введите название товара для обновления количества:\n> ";
    $itemName = trim(fgets(STDIN));

    if (isset($items[$itemName])) {
        echo "Введите новое количество для \"$itemName\":\n> ";
        $quantity = (int) trim(fgets(STDIN));
        $items[$itemName] = $quantity;
        echo "Количество для \"$itemName\" обновлено до $quantity.\n";
    } else {
        echo "Товар \"$itemName\" не найден.\n";
    }
}

do {
    // system('clear');
    system('cls');
    $operationNumber = promptForAction($operations);

    echo 'Выбрана операция: ' . $operations[$operationNumber] . PHP_EOL;

    switch ($operationNumber) {
        case OPERATION_ADD:
            addItem($items);
            break;
        case OPERATION_DELETE:
            deleteItem($items);
            break;
        case OPERATION_PRINT:
            printList($items);
            break;
        case OPERATION_MODIFY:
            modifyItem($items);
            break;
        case OPERATION_QUANTITY:
            addItemQuantity($items);
            break;
    }

    echo "\n ----- \n";
} while ($operationNumber !== OPERATION_EXIT);

echo 'Программа завершена' . PHP_EOL;