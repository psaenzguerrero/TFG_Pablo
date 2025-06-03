<main class="min-h-screen bg-gray-50">
    <section class="pt-32 pb-24 px-4 sm:px-6 lg:px-8">   
        <div class="max-w-7xl mx-auto">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-gray-800">Tu Carrito de Compras</h1>
                </div>
                
                <?php if (empty($carrito)): ?>
                    <div class="p-6 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-900">Carrito vacío</h3>
                        <p class="mt-1 text-gray-500">No hay productos en tu carrito.</p>
                        <div class="mt-6">
                            <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Continuar comprando
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Producto</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Fecha de Compra</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach ($carritos as $carrito): ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900"><?php echo $carrito['nombre_producto']; ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            $<?php echo number_format($carrito['precio_producto'], 2); ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden md:table-cell">
                                            <?php echo $carrito['fecha_compra']; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?php echo $carrito['cantidad']; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <form action="index.php?action=eliminarDelCarrito" method="POST">
                                                <input type="hidden" name="id_producto" value="<?php echo $carrito['id_producto']; ?>">
                                                <input type="hidden" name="cantidad" value="<?php echo $carrito['cantidad']; ?>">
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="p-6 border-t border-gray-200">
                        <div class="flex justify-end">
                            <!-- Botón Comprar Todo - Ahora es un checkbox oculto que controla el modal -->
                            <div class="group relative">
                                <!-- Checkbox oculto que controla el estado del modal -->
                                <input type="checkbox" id="modalToggle" class="peer absolute opacity-0 w-0 h-0">
                                
                                <!-- Botón que actúa como label para el checkbox -->
                                <label for="modalToggle" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
                                    Comprar Todo
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </label>
                                
                                <!-- Modal - Se muestra cuando el checkbox está checked -->
                                <div class="fixed inset-0 z-50 flex items-center justify-center p-4 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible transition-opacity duration-300">
                                    <!-- Fondo oscuro -->
                                    <label for="modalToggle" class="absolute inset-0 bg-gray-900 bg-opacity-50 cursor-pointer"></label>
                                    
                                    <!-- Contenido del modal -->
                                    <div class="relative bg-white rounded-lg shadow-xl w-full max-w-md max-h-[90vh] overflow-y-auto">
                                        <form id="paymentForm" action="index.php?action=compraDelCarrito" method="POST" class="space-y-4">
                                            <div class="p-6">
                                            <h3 class="text-lg font-bold text-gray-900 mb-4">Selecciona método de pago</h3>
                    
                                                <!-- Tarjeta de crédito -->
                                                <div class="flex items-start">
                                                    <input id="credit-card" name="payment" type="radio" value="tarjeta" class="mt-1 h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                                    <label for="credit-card" class="ml-3 block">
                                                        <span class="font-medium text-gray-900">Tarjeta de crédito/débito</span>
                                                        <div class="flex mt-1">
                                                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/visa/visa-original.svg" class="h-6 mr-2" alt="Visa">
                                                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mastercard/mastercard-original.svg" class="h-6 mr-2" alt="Mastercard">
                                                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/apple/apple-original.svg" class="h-6" alt="Apple Pay">
                                                        </div>
                                                    </label>
                                                </div>
                                                
                                                <!-- PayPal -->
                                                <div class="flex items-start">
                                                    <input id="paypal" name="payment" type="radio" value="paypal" class="mt-1 h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                                    <label for="paypal" class="ml-3 block">
                                                        <span class="font-medium text-gray-900">PayPal</span>
                                                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/paypal/paypal-original.svg" class="h-6 mt-1" alt="PayPal">
                                                    </label>
                                                </div>
                                                
                                                <!-- Transferencia bancaria -->
                                                <div class="flex items-start">
                                                    <input id="bank-transfer" name="payment" type="radio" value="transferencia" class="mt-1 h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                                    <label for="bank-transfer" class="ml-3 block">
                                                        <span class="font-medium text-gray-900">Transferencia bancaria</span>
                                                        <span class="text-gray-500 text-sm block mt-1">Pago directo desde tu banco</span>
                                                    </label>
                                                </div>
                                                
                                                <!-- Efectivo -->
                                                <div class="flex items-start">
                                                    <input id="cash" name="payment" type="radio" value="efectivo" class="mt-1 h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                                                    <label for="cash" class="ml-3 block">
                                                        <span class="font-medium text-gray-900">Efectivo al recoger</span>
                                                        <span class="text-gray-500 text-sm block mt-1">Solo disponible para recogida en tienda</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="bg-gray-50 px-4 py-3 flex flex-row-reverse">
                                                <button type="submit"  class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3">
                                                Confirmar pago
                                                </button>
                                                <label for="modalToggle" class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
                                                    Cancelar
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>