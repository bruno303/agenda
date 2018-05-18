<?php if(!class_exists('Rain\Tpl')){exit;}?>            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    RA
                                </th>
                                <th>
                                    Login
                                </th>
                                <th>
                                    Admin
                                </th>
                                <th>
                                    Active
                                </th>
                                <th>
                                    Options
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($user) && ( is_array($user) || $user instanceof Traversable ) && sizeof($user) ) foreach( $user as $key1 => $value1 ){ $counter1++; ?>
                            <tr <?php if( $value1["ACTIVE"] != 1 ){ ?>class="danger"<?php } ?>>
                                <td>
                                    <?php echo htmlspecialchars( $value1["ID_STUDENT"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars( $value1["NAME"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars( $value1["RA"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars( $value1["LOGIN"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars( $value1["IS_ADMIN"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars( $value1["ACTIVE"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                </td>
                                <td>
                                    <a href="/eduse/<?php echo htmlspecialchars( $value1["ID_STUDENT"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><button class="btn btn-sm btn-primary">Edit</button></a>
                                    <?php if( $value1["ACTIVE"] == 1 ){ ?>
                                        <a href="/disuse/<?php echo htmlspecialchars( $value1["ID_STUDENT"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><button class="btn btn-sm btn-danger">Disable</button></a>
                                    <?php }else{ ?>
                                        <a href="/enuse/<?php echo htmlspecialchars( $value1["ID_STUDENT"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><button class="btn btn-sm btn-danger">Enable</button></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="/students"><button class="btn btn-default btn-large btn-block">Add Student</button></a>
                </div>
                <div class="col-md-3"></div>
            </div>